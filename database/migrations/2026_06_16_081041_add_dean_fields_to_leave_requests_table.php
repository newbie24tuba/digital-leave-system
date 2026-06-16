```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leave_requests', function (Blueprint $table) {

            $table->text('dean_comment')
                  ->nullable()
                  ->after('status');

            $table->timestamp('approved_at')
                  ->nullable()
                  ->after('dean_comment');

        });
    }

    public function down(): void
    {
        Schema::table('leave_requests', function (Blueprint $table) {

            $table->dropColumn([
                'dean_comment',
                'approved_at'
            ]);

        });
    }
};
