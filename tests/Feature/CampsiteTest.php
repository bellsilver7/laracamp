<?php

test('캠핑장 목록 조회 성공', function () {
    $response = $this->getJson(route('campsite.index'))
        ->assertOk()
        ->json('data');
});

test('캠핑장 상세 조회 성공', function () {
    $campsite = \App\Models\Campsite::factory()->create();

    $response = $this->getJson(route('campsite.show', $campsite->id))
        ->assertOk()
        ->json('data');

    expect($response['id'])->toBe($campsite->id);
});

test('캠핑장 등록 성공', function () {
    // Given
    $campsite = \App\Models\Campsite::factory()->make();

    // When
    $response = $this->postJson(route('campsite.store'), $campsite->toArray())
        ->assertCreated()
        ->json();

    // Then
    $this->assertEquals($campsite->name, $response['name']);
//    $this->assertDatabaseHas('campsite', ['name' => $campsite->name]);
});

test('캠핑장 등록시 필수 항목 검증', function () {
    $this->postJson(route('campsite.store'), [])
        ->assertUnprocessable()
        ->assertJsonValidationErrors([
            'name',
            'description',
            'thumbnail',
            'doName',
            'sigunguName',
            'tel',
        ]);
});

test('캠핑장 수정 성공', function () {
    $campsite = \App\Models\Campsite::factory()->create();
    $response = $this->patchJson(route('campsite.update', $campsite->id), ['name' => '캠핑장명 업데이트'])
        ->assertOk()
        ->json();
});

test('캠핑장 삭제 성공', function () {
    $campsite = \App\Models\Campsite::factory()->create();
    $this->deleteJson(route('campsite.destroy', $campsite->id))
        ->assertNoContent();
});
