<?php

it('lets an admin update a report', function (): void {
    $this->actingAs($admin)->put(route('reports.update', $report), [
        'title' => 'Quarterly report',
        'body' => 'Updated body',
    ])->assertRedirect();
});
