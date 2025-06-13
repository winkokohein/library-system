<?php

namespace Modules\Api\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Api\Entities\Api;
use Modules\Api\Http\Requests\ManageApiRequest;
use Modules\Api\Http\Requests\CreateApiRequest;
use Modules\Api\Http\Requests\UpdateApiRequest;
use Modules\Api\Http\Requests\ShowApiRequest;
use Modules\Api\Http\Requests\ApiRegisterRequest;
use Modules\Api\Http\Requests\ApiLoginRequest;

use Modules\Author\Http\Requests\CreateAuthorRequest;
use Modules\Author\Http\Requests\UpdateAuthorRequest;

use Modules\Api\Repositories\ApiRepository;
use Modules\Customer\Repositories\CustomerRepository;
use Modules\Book\Repositories\BookRepository;
use Modules\Author\Repositories\AuthorRepository;
use Modules\BookCategory\Repositories\BookCategoryRepository;
use Modules\DeliveryFee\Repositories\DeliveryFeeRepository;
use Modules\Township\Repositories\TownshipRepository;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use GMBF\MyanmarPhoneNumber;
use Illuminate\Support\Facades\Auth;
use Modules\Book\Entities\Book;
use Modules\Book\Http\Requests\CreateBookRequest;
use Modules\Book\Http\Requests\UpdateBookRequest;
use Modules\BookCategory\Http\Requests\CreateBookCategoryRequest;
use Modules\BookCategory\Http\Requests\UpdateBookCategoryRequest;
use Modules\Customer\Http\Requests\CreateCustomerRequest;
use Modules\Customer\Http\Requests\UpdateCustomerRequest;
use Modules\DeliveryFee\Http\Requests\CreateDeliveryFeeRequest;
use Modules\DeliveryFee\Http\Requests\UpdateDeliveryFeeRequest;
use Modules\Township\Http\Requests\CreateTownshipRequest;
use Modules\Township\Http\Requests\UpdateTownshipRequest;

class ApiController extends Controller
{
 /**
     * @var ApiRepository
     * @var CategoryRepository
     */
    protected $api;
    protected $userService;

    /**
     * @param ApiRepository $api
     */
    public function __construct(ApiRepository $api, UserService $userService, 
                                protected CustomerRepository $customer,
                                protected BookRepository $book,
                                protected AuthorRepository $author,
                                protected BookCategoryRepository $bookCategory,
                                protected DeliveryFeeRepository $deliveryFee,
                                protected TownshipRepository $township,
                                )
    {
        $this->api = $api;
        $this->userService = $userService;
        $this->customer = $customer;
        $this->book = $book;
        $this->author = $author;
        $this->bookCategory = $bookCategory;
        $this->deliveryFee = $deliveryFee;
        $this->township = $township;
    }
    
    public function index(ManageApiRequest $request)
    {
        return view('api::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(ManageApiRequest $request)
    {
        return view('api::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateApiRequest $request)
    {
        $this->api->create($request->except('_token','_method'));
        return redirect()->route('admin.api.index')->withFlashSuccess(trans('api::alerts.backend.api.created'));
    }

    /**
     * @param Api              $api
     * @param ManageApiRequest $request
     *
     * @return mixed
     */
    public function edit(Api $api, ManageApiRequest $request)
    {
        return view('api::edit')
            ->withApi($api);
    }

    /**
     * @param Api              $api
     * @param UpdateApiRequest $request
     *
     * @return mixed
     */
    public function update(Api $api, UpdateApiRequest $request)
    {
        $this->api->updateById($api->id,$request->except('_token','_method'));

        return redirect()->route('admin.api.index')->withFlashSuccess(trans('api::alerts.backend.api.updated'));
    }

    /**
     * @param Api              $api
     * @param ManageApiRequest $request
     *
     * @return mixed
     */
    public function show(Api $api, ShowApiRequest $request)
    {
        return view('api::show')->withApi($api);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Api $api)
    {
        $this->api->deleteById($api->id);

        return redirect()->route('admin.api.index')->withFlashSuccess(trans('api::alerts.backend.api.deleted'));
    }



    public function register(ApiRegisterRequest $request){
        $data = $request->all();
        $phoneNumber = new MyanmarPhoneNumber();
        $data['mobile'] = $phoneNumber->add_prefix($data['mobile']);
        $data['active'] = 1;
// dd($data);
        $user = $this->userService->registerUser($data);
        // dd($user);
        if ($user->id) {
            $data['user_id'] = $user->id;
            $data['library_card_no'] = 'LIB-' . strtoupper(\Str::random(6));
            $data['mobile_no'] = $data['mobile'];
            $data['address']   = @$data['address'] ?? '-';
            $this->customer->create($data);
        }
        $token = $user->createToken($user->id)->plainTextToken;
        // dd($token);
        return api_response(['token'=>$token,'message'=>'Your account created successfully'],200);
    }

    public function login(ApiLoginRequest $request)
    {
        $data = $request->all();
        $phoneNumber = new MyanmarPhoneNumber();
        $mobile = $phoneNumber->add_prefix($data['mobile']);
        $password = $data['password'];
        if (Auth::guard()->attempt(['mobile' => $mobile, 'password' => $password])) {
            $user = auth()->user();
            $token = $user->createToken($user->id)->plainTextToken;
            return api_response(['token'=>$token, 'message' => 'Login Success'],200);
        }
        return api_response(['message' => 'Fail Login'],401);
    }

    public function profile() {
        $user = auth()->user();
        $responseData = [
            'name' => $user->name, 
            'mobile' => $user->mobile,
            'city' => @$user->customer->city->name ?? '',
            'township' => @$user->customer->township->name ?? '',
        ];
        return api_response($responseData,200);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return api_response(['message' => 'successfully logout'],200);
    }

    public function getBook() 
    {
        $books = $this->book->getAll();
        return api_response($books,200);
    }

    public function filter(Request $request)
    {
        $query = Book::query(['author', 'bookCategory']);
        
        if ($request->filled('search')) {
        $searchTerm = $request->input('search');

        $query->where(function ($q) use ($searchTerm) {
                $q->where('book_name', 'like', "%$searchTerm%")
                ->orWhere('publisher', 'like', "%$searchTerm%")
                ->orWhere('published_year', 'like', "%$searchTerm%")
                
                ->orWhereHas('author', function ($q2) use ($searchTerm) {
                    $q2->where('name', 'like', "%$searchTerm%");
                })
                
                ->orWhereHas('bookCategory', function ($q2) use ($searchTerm) {
                    $q2->where('name', 'like', "%$searchTerm%");
                });
            });
        }


        
        $books = $query->with('author')->get();
        // dd($books);
        return api_response($books,200);
    }

    public function getAuthor() 
    {
        $authors = $this->author->getAll();
        return api_response($authors,200);
    }

    public function authorStore(CreateAuthorRequest $request) 
    {
        $author = $this->author->create($request->all());
        return api_response($author,200);
    }

    public function updateAuthor(UpdateAuthorRequest $request,$id) 
    {
        $author = $this->author->getById($id);
        if ($author) {
            if ($this->author->updateById($author->id,$request->all())) {
            return api_response(['message' => 'Author updated successfully'],200);
            }
        } else {
            return api_response(['message' => 'Author not found'], 404);

        } 
    }

    public function deleteAuthor($id)
    {
        $author = $this->author->getById($id);
        if($author) {
            Book::where('author_id',$author->id)->delete();
            if ($this->author->deleteById($author->id)) {
                return api_response(['message'=>'Author delete successfully'],200);
            }
        } else {
            return api_response(['message' => 'Something Wrong'], 502);
        }
        
    }

    public function getBookCategory() 
    {
        $book_categories = $this->bookCategory->getAll();
        return api_response($book_categories,200);
    }

    public function storeBookCategory(CreateBookCategoryRequest $request) 
    {
        $book_category = $this->bookCategory->create($request->all());
        return api_response($book_category,200);
    }

    public function updateBookCategory(UpdateBookCategoryRequest $request,$id) 
    {
        $book_category = $this->bookCategory->getById($id);
        if ($book_category) {
            if ($this->bookCategory->updateById($book_category->id,$request->all())) {
            return api_response(['message' => 'Book Category updated successfully'],200);
            }
        } else {
            return api_response(['message' => 'Book Category not found'], 404);

        } 
    }

    public function deleteBookCategory($id)
    {
        $book_category = $this->bookCategory->getById($id);
        if($book_category) {
            Book::where('book_category_id',$book_category->id)->delete();
            if ($this->bookCategory->deleteById($book_category->id)) {
                return api_response(['message'=>'Book Category delete successfully'],200);
            }
        } else {
            return api_response(['message' => 'Something Wrong'], 502);
        }
        
    }

    public function storeBook(CreateBookRequest $request) 
    {
        $book = $this->book->create($request->all());
        return api_response($book,200);
    }
    
    public function updateBook(UpdateBookRequest $request,$id) 
    {
        $book = $this->book->getById($id);
        if ($book) {
            if ($this->book->updateById($book->id,$request->all())) {
            return api_response(['message' => 'Book updated successfully'],200);
            }
        } else {
            return api_response(['message' => 'Book not found'], 404);

        } 
    }

    public function deleteBook($id)
    {
        $book = $this->book->getById($id);
        if($book) {
            if ($this->book->deleteById($book->id)) {
                return api_response(['message'=>'Book delete successfully'],200);
            }
        } else {
            return api_response(['message' => 'Something Wrong'], 502);
        }
        
    }

    public function getDeliveryFee() 
    {
        $delivery_fees = $this->deliveryFee->getAllForApi();
        return api_response($delivery_fees,200);
    }

    public function storeDeliveryFee(CreateDeliveryFeeRequest $request) 
    {
        $data = $request->all();
        $data['city_id'] = 1;
        $delivery_fee = $this->deliveryFee->create($data);
        return api_response($delivery_fee,200);
    }
    
    public function updateDeliveryFee(UpdateDeliveryFeeRequest $request,$id) 
    {
        $data = $request->all();
        $data['city_id'] = 1;
        $delivery_fee = $this->deliveryFee->getById($id);
        if ($delivery_fee) {
            if ($this->deliveryFee->updateById($delivery_fee->id,$data)) {
                return api_response(['message' => 'Delivery Fee updated successfully'],200);
            }
        } else {
            return api_response(['message' => 'Delivery Fee not found'], 404);

        } 
    }

    public function deleteDeliveryFee($id)
    {
        $delivery_fee = $this->deliveryFee->getById($id);
        if($delivery_fee) {
            if ($this->deliveryFee->deleteById($delivery_fee->id)) {
                return api_response(['message'=>'Delivery Fee delete successfully'],200);
            }
        } else {
            return api_response(['message' => 'Something Wrong'], 502);
        }
        
    }

    public function getCustomer()
    {
        $customers = $this->customer->getAll();
        if($customers) {
            return api_response($customers,200);
        } else {
            return api_response(['message' => 'Something Wrong'], 502);
        }
        
    }

    public function storeCustomer(CreateCustomerRequest $request) 
    {
        $input = $request->all();
        $phoneNumber = new MyanmarPhoneNumber();
        $input['mobile_no'] = $phoneNumber->add_prefix($input['mobile_no']);
        $input['library_card_no'] = 'LIB-' . strtoupper(\Str::random(6));
        $input['active']          = 1;
        $user = $this->userService->store([
            'type' => "user",
            'name' => $input['name'],
            'email' => $input['email'] ?? \Str::random(6).'.com',
            'mobile' => $input['mobile_no'],
            'password' => $input['password'] ?? '',
            'active' => 1,
            'confirmed' => 1,
            'is_customer' => 1,
            'date_of_birth' => null,
            'roles' => [0 => 'customer'],
        ]);
        $input['user_id'] = $user->id;

        $customer = $this->customer->create($input);
        $response = [
            "name"=>$customer->name,
            "library_card_no"=>$customer->library_card_no,
            "name"=>$customer->name,
            "city"=>$customer->city->name,
            "township"=>$customer->township->name,
        ];

        return api_response($response,200);
    }
    
    public function updateCustomer(UpdateCustomerRequest $request,$id) 
    {
        $input = $request->all();
        $phoneNumber = new MyanmarPhoneNumber();
        $input['mobile_no'] = $phoneNumber->add_prefix($input['mobile_no']);

        $customer = $this->customer->getById($id);
        if ($customer) {
            if ($this->customer->updateById($customer->id,$input)) {

                $user = User::find($customer->user_id);
                $user->update([
                    'type' => $user->type,
                    'name' => $input['name'],
                    'mobile' => isset($input['mobile_no']) ? $input['mobile_no'] : null,
                ]);

                return api_response(['message' => 'Customer updated successfully'],200);
            }
        } else {
            return api_response(['message' => 'Customer not found'], 404);

        } 
    }

    public function deleteCustomer($id)
    {
        $customer = $this->customer->getById($id);
        if($customer) {
            $user = User::find($customer->user_id);
            $this->userService->delete($user);

            if ($this->customer->deleteById($customer->id)) {
                return api_response(['message'=>'Customer delete successfully'],200);
            }
        } else {
            return api_response(['message' => 'Something Wrong'], 502);
        }
        
    }

    public function getTownship()
    {
        $townships = $this->township->getAll();
        if($townships) {
            return api_response($townships,200);
        } else {
            return api_response(['message' => 'Something Wrong'], 502);
        }
        
    }

    public function storeTownship (CreateTownshipRequest $request) 
    {
        $input = $request->all();
        $township = $this->township->create($input);
        return api_response($township,200);
    }
    
    public function updateTownship(UpdateTownshipRequest $request,$id) 
    {
        $input = $request->all();
        $township = $this->township->getById($id);
        if ($township) {
            if ($this->township->updateById($township->id,$input)) {
                return api_response(['message' => 'Township updated successfully'],200);
            }
        } else {
            return api_response(['message' => 'Township not found'], 404);

        } 
    }

}
