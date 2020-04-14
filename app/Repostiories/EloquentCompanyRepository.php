<?php

namespace App\Repositories;

use App\Company;
use App\Repositories\Contracts\CompanyRepositoryInterface;

class EloquentCompanyRepository implements CompanyRepositoryInterface
{
    public function get(int $id): ?Company
    {
        return Company::findOrFail($id);
    }

    public function store(Company $company)
    {
        $company->save();
    }

    public function all(): array
    {
        return Company::all()->all();
    }
}
