<?php
$path = __DIR__ . '/output/test.txt';

if (file_put_contents($path, 'test success')) {
    echo "✅ File write successful";
} else {
    echo "❌ File write failed";
}
