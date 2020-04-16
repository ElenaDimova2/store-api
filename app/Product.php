<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    public function orders()
    {
      return $this->belongsToMany(
          Order::class,
          'orders_products',
          'product_id',
          'order_id'
      )->withPivot('quantity')
      ->withTimestamps();
    }

    public function company()
    {
      return $this->belongsTo('App\Company');
    }

    public function getCompany()
    {
      return $this->company;
    }

    public function setCompany(Company $company)
    {
        $this->company()->associate($company);
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    public function setName(string $name)
    {
        $this->setAttribute('name', $name);
    }

    public function getDescription(): string
    {
        return $this->getAttribute('description');
    }

    public function setDescription(string $description)
    {
        $this->setAttribute('description', $description);
    }

    public function getPrice(): float
    {
        return $this->getAttribute('price');
    }

    public function setPrice(float $price)
    {
        $this->setAttribute('price', $price);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function setUser(User $user)
    {
        $this->user()->associate($user);
    }

    public function getUser(): User
    {
        return $this->user()->get()->first();
    }

}
