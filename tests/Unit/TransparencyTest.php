<?php

namespace Tests\Unit;

use App\Transparency;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class TransparencyTest extends TestCase
{
    use RefreshDatabase;

    public function test_economic_document_upload()
    {
        $user = factory(User::class)->create();
        $kilobytes=2222;
        $file = UploadedFile::fake()->create('document.pdf', $kilobytes);

    }
}
