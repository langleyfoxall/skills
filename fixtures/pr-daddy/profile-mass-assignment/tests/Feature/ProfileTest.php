<?php

it('updates a profile', function (): void {
    $this->actingAs($user)->patch('/profile', ['name' => 'Taylor'])
        ->assertSessionHasNoErrors();
});
