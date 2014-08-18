<?php

$app->get('/cron/reset', function () use ($app){
    $source = $app['config']['data_dir'] .'/backup.db';

    copy($source, $app['config']['db']['path']);

    $files = glob($app['config']['upload_dir'] .'/*');
    foreach($files as $file)
    {
      if(is_file($file))
      {
          unlink($file);
      }
    }

    return 'Reset completed.';
});
