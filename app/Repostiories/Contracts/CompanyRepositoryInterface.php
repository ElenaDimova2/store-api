<?php

namespace App\Repositories\Contracts;

use App\Company;

interface CompanyRepositoryInterface
{
    public function get(int $id): ?Company;

    public function store(Company $company);

    public function all(): array;
}
