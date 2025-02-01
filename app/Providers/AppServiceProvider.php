<?php

namespace App\Providers;

use App\Models\User;
use App\Repositories\{
    CategoryRepository,
    ImageRepository,
    ProductRepository,
    UserRepository,
    CartRepository,
    AddressRepository,
    OrderRepository,
    TransactionRepository,
    OrderItemRepository,
};
use App\Repositories\Interfaces\{
    CategoryRepositoryInterface,
    ImageRepositoryInterface,
    ProductRepositoryInterface,
    UserRepositoryInterface,
    CartRepositoryInterface,
    AddressRepositoryInterface,
    TransactionRepositoryInterface,
    OrderItemRepositoryInterface,
    OrderRepositoryInterface
};
use App\Services\{
    Cart\CartService,
    Category\CategoryService,
    Images\ImageService,
    Products\ProductsService,
    User\UserService,
    Orders\OrderService,
    OrderItem\OrderItemService,
    Transaction\TransactionService,
    Address\AddressService
};
use App\Services\{
    Cart\CartServiceInterface,
    Category\CategoryServiceInterface,
    Images\ImageServiceInterface,
    Products\ProductsServiceInterface,
    User\UserServiceInterface,
    Orders\OrderServiceInterface,
    OrderItem\OrderItemServiceInterface,
    Transaction\TransactionServiceInterface,
    Address\AddressServiceInterface
};

use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->bindRepositories();
        $this->bindServices();
    }

    /**
     * Bind repositories to their interfaces.
     */
    private function bindRepositories()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
        $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderItemRepositoryInterface::class, OrderItemRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
    }

    /**
     * Bind services to their interfaces.
     */
    private function bindServices()
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(CategoryServiceInterface::class, CategoryService::class);
        $this->app->bind(ProductsServiceInterface::class, ProductsService::class);
        $this->app->bind(ImageServiceInterface::class, ImageService::class);
        $this->app->bind(CartServiceInterface::class, CartService::class);
        $this->app->bind(AddressServiceInterface::class, AddressService::class);
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
        $this->app->bind(OrderItemServiceInterface::class, OrderItemService::class);
        $this->app->bind(TransactionServiceInterface::class, TransactionService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Cashier::useCustomerModel(User::class);
        Cashier::calculateTaxes();
    }
}
