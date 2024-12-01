<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.parts.head')
</head>

<body>
    <section class="admin">
        <div class="row-grid">
            <div class="admin-sidebar">
                @include('admin.parts.sidebar')
            </div>
            <div class="admin-content">
                <div class="admin-content-top">
                    @include('admin.parts.header')
                </div>
                <div class="admin-content-main">
                    <div class="admin-content-main-title">
                        <h2>Dashboard</h2>
                    </div>
                    <div class="admin-content-main-content">

                    </div>
                </div>
            </div>
    </section>
</body>
<footer>
    @include('admin.parts.footer')
</footer>

</html>