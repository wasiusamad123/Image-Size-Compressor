# Image-Size-Compressor
This PHP script is designed to compress the size of images uploaded by the user. It reduces the file size of the image without compromising on the quality.

How it works
The script checks the file extension of the uploaded image and verifies that it is a valid type (png, jpeg, or jpg). It then creates a compressed version of the image using the compressImage() function.

The compressImage() function uses the GD library to create an image resource from the uploaded file. It then applies a JPEG compression to the image and saves it to the specified location.
