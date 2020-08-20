<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class TransparencyTest extends TestCase
{
    use RefreshDatabase;

    public function testAvatarUpload()
    {
        $sizeInKilobytes = 1000000;

        Storage::fake('avatars');

        UploadedFile::fake()->create('document.pdf', $sizeInKilobytes, 'trasparency/pdf');
    }
}
