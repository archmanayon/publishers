<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pulishing>
 */
class PulishingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'publisher_number' => $this->faker->randomNumber(),
'publisher_name' => $this->faker->word(),
'isbn' => $this->faker->word(),
'sku' => $this->faker->word(),
'parent_isbn' => $this->faker->word(),
'title' => $this->faker->word(),
'author' => $this->faker->word(),
'page_count' => $this->faker->randomNumber(),
'binding_type' => $this->faker->word(),
'book_type_id' => $this->faker->word(),
'list_price' => $this->faker->randomFloat(2, 0, 1000),
'wholesale_discount_%' => $this->faker->randomNumber(),
'MTD_Quantity' => $this->faker->randomFloat(2, 0, 1000),
'MTD_avg_list_price' => $this->faker->randomFloat(2, 0, 1000),
'MTD_extended_list' => $this->faker->randomFloat(2, 0, 1000),
'MTD_avg_discount_%' => $this->faker->randomNumber(),
'MTD_extended_discount' => $this->faker->randomFloat(2, 0, 1000),
'MTD_avg_wholesale_price' => $this->faker->randomFloat(2, 0, 1000),
'MTD_extended_wholesale' => $this->faker->randomFloat(2, 0, 1000),
'MTD_avg_print_charge' => $this->faker->randomFloat(2, 0, 1000),
'MTD_extended_print_charge' => $this->faker->randomFloat(2, 0, 1000),
'MTD_gross_pub_comp' => $this->faker->randomFloat(2, 0, 1000),
'MTD_extended_adjustments' => $this->faker->randomFloat(2, 0, 1000),
'MTD_extended_recovery' => $this->faker->randomFloat(2, 0, 1000),
'MTD_pub_comp' => $this->faker->randomFloat(2, 0, 1000),
'YTD_quantity' => $this->faker->randomFloat(2, 0, 1000),
'YTD_avg_list_price' => $this->faker->randomFloat(2, 0, 1000),
'YTD_extended_list_price' => $this->faker->randomFloat(2, 0, 1000),
'YTD_avg_discount_%' => $this->faker->randomNumber(),
'YTD_extended_discount' => $this->faker->randomFloat(2, 0, 1000),
'YTD_avg_wholesale_price' => $this->faker->randomFloat(2, 0, 1000),
'YTD_extended_wholesale' => $this->faker->randomFloat(2, 0, 1000),
'YTD_avg_print_charge' => $this->faker->randomFloat(2, 0, 1000),
'YTD_extended_print_charge' => $this->faker->randomFloat(2, 0, 1000),
'YTD_gross_pub_comp' => $this->faker->randomFloat(2, 0, 1000),
'YTD_extended_adjustments' => $this->faker->randomFloat(2, 0, 1000),
'YTD_extended_recovery' => $this->faker->randomFloat(2, 0, 1000),
'YTD_pub_comp' => $this->faker->randomFloat(2, 0, 1000),
'deferral_balance' => $this->faker->randomFloat(2, 0, 1000),
'reporting_currency_code' => $this->faker->word(),
'period_name' => $this->faker->dateTimeBetween('-3 years', '-1 years'),
'original_deferral_amount' => $this->faker->randomFloat(2, 0, 1000),
'MTD_return_quantity' => $this->faker->randomFloat(2, 0, 1000),
'MTD_return_wholesale' => $this->faker->randomFloat(2, 0, 1000),
'MTD_return_charge' => $this->faker->randomFloat(2, 0, 1000),
'MTD_return_total' => $this->faker->randomFloat(2, 0, 1000),
'YTD_return_quantity' => $this->faker->randomFloat(2, 0, 1000),
'YTD_return_wholesale' => $this->faker->randomFloat(2, 0, 1000),
'YTD_return_charge' => $this->faker->randomFloat(2, 0, 1000),
'YTD_return_total' => $this->faker->randomFloat(2, 0, 1000),
'MTD_net_quantity' => $this->faker->randomFloat(2, 0, 1000),
'MTD_net_wholesale' => $this->faker->randomFloat(2, 0, 1000),
'MTD_net_pub_comp' => $this->faker->randomFloat(2, 0, 1000),
'YTD_net_quantity' => $this->faker->randomFloat(2, 0, 1000),
'YTD_net_wholesale' => $this->faker->randomFloat(2, 0, 1000),
'YTD_net_pub_comp' => $this->faker->randomFloat(2, 0, 1000),
'returns_flag_value' => $this->faker->word(),
'nonreturnable_date' => $this->faker->dateTimeBetween('-3 years', '-1 years'),
'title_status_flag_value' => $this->faker->word(),
'cancelled_date' => $this->faker->dateTimeBetween('-3 years', '-1 years'),
'publisher_imprint' => $this->faker->word(),
'customer_flexfield1' => $this->faker->word(),
'customer_flexfield2' => $this->faker->word(),
'customer_flexfield3' => $this->faker->word(),
'customer_flexfield4' => $this->faker->word(),
'customer_flexfield5' => $this->faker->word(),
'isbn_13' => $this->faker->word(),
'MTD_wholesale_tax' => $this->faker->randomFloat(2, 0, 1000),
'MTD_print_charge_tax' => $this->faker->randomFloat(2, 0, 1000),
'MTD_return_wholesale_tax' => $this->faker->randomFloat(2, 0, 1000),
'MTD_return_charge_tax' => $this->faker->word(),
'YTD_wholesale_tax' => $this->faker->randomFloat(2, 0, 1000),
'YTD_print_charge_tax' => $this->faker->randomFloat(2, 0, 1000),
'YTD_return_wholesale_tax' => $this->faker->randomFloat(2, 0, 1000),
'YTD_return_charge_tax' => $this->faker->word(),
'market' => $this->faker->word(),
'sales_category' => $this->faker->word(),
'Mtd_global_distribution_fee' => $this->faker->randomFloat(2, 0, 1000),
'Mtd_global_distribution_fee_tax' => $this->faker->randomFloat(2, 0, 1000),
'Ytd_global_distribution_fee' => $this->faker->randomFloat(2, 0, 1000),
'Ytd_global_distribution_fee_tax' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
