# JALA-backend-test

API Doc : https://documenter.getpostman.com/view/3545355/UzdzTRE5

---------------------------------------------------------------------
membuat sebuah backend menggunakan Laravel untuk Toko Online sederhana dengan spesifikasi sebagai berikut.

1. Terdapat 2 role, admin dan user
2. Admin dapat menambahkan Product dengan detail
    1. SKU
    2. Nama Product
    3. Harga Satuan
3. Admin dapat menambahkan Stock dengan membuat Purchase Order dengan detail
    1. Invoice Number
    2. List Pembelian Product dengan detail
        1. Quantity
        2. Harga Satuan
4. User dapat melihat list Product beserta stock nya
5. User dapat membuat Pending Sale Order dengan detail
    1. Customer
    2. List Product dengan detail
        1. Quantity
        2. Harga Satuan
6. Admin dapat mengappprove Pending Sale Order menjadi Sale Order
7. Admin juga dapat membuat langsung Sale Order dengan detail
    1. Invoice Number
    2. Customer
    3. List Product dengan detail
        1. Quantity
        2. Harga Satuan
