<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

uses(RefreshDatabase::class);

it('redirects guests away from the dashboard', function () {
    $this->get('/dashboard')->assertRedirect('/login');
});

it('allows admin to see only the admin dashboard component', function () {
    $admin = User::factory()->create();
    $admin->assignRole(Role::create(['name'=>'admin']));
    $this->actingAs($admin)
        ->get('/dashboard')
        ->assertOk()
        ->assertSeeLivewire('admin.admin-dashboard')
        ->assertDontSeeLivewire('trainer.trainer-dashboard')
        ->assertDontSeeLivewire('staff.staff-dashboard');
});

it('allows trainer to see only the trainer dashboard component', function () {
    $trainer = User::factory()->create();
    $trainer->assignRole(Role::create(['name'=>'trainer']));


    $this->actingAs($trainer)
        ->get('/dashboard')
        ->assertOk()
        ->assertSeeLivewire('trainer.trainer-dashboard')
        ->assertDontSeeLivewire('admin.admin-dashboard')
        ->assertDontSeeLivewire('staff.staff-dashboard');
});

it('allows staff to see only the staff dashboard component', function () {
    $staff = User::factory()->create();
    $staff->assignRole(Role::create(['name'=>'staff']));

    $this->actingAs($staff)
        ->get('/dashboard')
        ->assertOk()
        ->assertSeeLivewire('staff.staff-dashboard')
        ->assertDontSeeLivewire('admin.admin-dashboard')
        ->assertDontSeeLivewire('trainer.trainer-dashboard');
});
