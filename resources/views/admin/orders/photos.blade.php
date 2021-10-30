@php
    // enable output of HTTP headers
    $options = new ZipStream\Option\Archive();
    $options->setSendHttpHeaders(true);

    // create a new zipstream object
    $zip = new ZipStream\ZipStream($order->user->name . '_fotos.zip', $options);

    foreach ($order->photos as $photo) {
        // add a file named 'some_image.jpg' from a local file 'path/to/image.jpg'
        if ($photo->status == 2) {
            $data = file_get_contents(Storage::url($photo->route_image));
            $zip->addFile(basename($photo->route_image), $data);
        }
    }
    
    // add a file named 'bar.jpg' with a comment and a last-modified
    /* $data = file_get_contents('http://AquaStudios.test/storage/images_order/8herRdpr9BXQ9imes0AdV8wF3plyGcDx0J5nIToh.jpg');
    $zip->addFile('bar.jpg', $data); */

    $zip->finish();
@endphp