<?php

it('downloads an export', function (): void {
    $this->actingAs($owner)->get(route('exports.download', $export))
        ->assertOk();
});
