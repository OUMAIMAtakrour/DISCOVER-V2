<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>addPOST</title>
</head>

<body>
<form action='/create' method="post" class="col-10 mx-auto my-4" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">TITLE</label>
        <input type="text" name="title" class="form-control" placeholder="Enter the title" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">DESCRIPTION</label>
        <textarea class="form-control" name="description" placeholder="Enter the description" rows="5" required></textarea>
    </div>

    <div class="input-group mb-3">
        <label for="inputGroupSelect01" class="input-group-text">OPTIONS</label>
        <select name="destination_id" id="inputGroupSelect01" class="form-control">
            <option selected>Choose...</option>
            @foreach ($destinations as $destination)
                <option value="{{ $destination->id }}">{{ $destination->des_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <input type="file" class="form-control" id="inputGroupFile02" name="images[]" accept="image/*" multiple required>
        <label for="inputGroupFile02" class="input-group-text">UPLOAD IMAGE</label>
        <div class="form-text">Choose image files (JPEG, PNG, JPG, GIF).</div>
    </div>

    <button type="submit" class="btn btn-primary">Add Post</button>
</form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>