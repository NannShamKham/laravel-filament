<?php

declare(strict_types=1);

namespace App\Dto;

class EmployeeData implements Dto
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public string $address,
        public string $country_id,
        public string $state_id,
        public string $city_id,
        public string $department_id,
        public string $zip_code,
        public string $birthday,
        public string $date_hired,
    ) {
    }

    public static function of($data): EmployeeData
    {
        return new EmployeeData(
            first_name: $data["first_name"],
            last_name: $data["last_name"],
            address: $data["address"],
            country_id: $data["country_id"],
            state_id: $data["state_id"],
            city_id: $data["city_id"],
            department_id: $data["department_id"],
            zip_code: $data["zip_code"],
            birthday: $data["birthday"],
            date_hired: $data["date_hired"],

        );
    }

    public function toArray(): array
    {
        return [
            //
        ];
    }
}
