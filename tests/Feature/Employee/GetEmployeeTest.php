<?php

namespace Tests\Feature\Employee;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetEmployeeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test GET the employee by rfid.
     *
     * @return void
     */
    public function test_get_employee_by_rfid()
    {
        $employee = Employee::first();

        $response = $this->getJson(
            "api/employee?cn=" . $employee->RFID,
        );

        $response->assertStatus(200);
    }

    /**
     * Test GET the employee by rfid and assert json structure is correct.
     *
     * @return void
     */
    public function test_assert_employee_json_structure_is_correct()
    {
        $employee = Employee::first();

        $response = $this->getJson("api/employee?cn=" . $employee->RFID);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'full_name',
            'departments' => []
        ]);
    }

    /**
     * Test GET the employee by rfid and assert json correct.
     *
     * @return void
     */
    public function test_assert_employee_json_is_correct()
    {
        $employee = Employee::first();

        $response = $this->getJson("api/employee?cn=" . $employee->RFID);

        $response->assertStatus(200);
        $response->assertJson([
            'full_name' => $employee->full_name,
            'departments' => $employee->departments->pluck("name")->toArray()
        ]);
    }

    /**
     * Test GET the employee by rfid and assert json correct.
     *
     * @return void
     */
    public function test_assert_employee_json_is_empty_with_incorret_rfid()
    {
        $response = $this->getJson("api/employee?cn=1234rdfdsdfewf");

        $response->assertStatus(200);
        $response->assertJson([
            'full_name' => "",
            'departments' => []
        ]);
    }
}
