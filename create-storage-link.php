<?php
$target = realpath(__DIR__ . '/core/storage/app/public');
$link = __DIR__ . '/storage';

if (!file_exists($link)) {
    symlink($target, $link);
    echo "✅ Symlink created from $target to $link";
} else {
    echo "⚠️ Link already exists or is a folder.";
}
