<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dynamic Dropdown</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<div id="variantsContainer">
    <!-- Nơi để thêm biến thể -->
</div>
<button onclick="addVariant()">Thêm Biến Thể</button>

<script>
    function addVariant() {
        $.ajax({
            url: 'get_data.php',
            type: 'GET',
            success: function(data) {
                const variantsContainer = document.getElementById('variantsContainer');
                const newVariant = document.createElement('div');
                newVariant.className = 'variant';
                newVariant.innerHTML = data;

                variantsContainer.appendChild(newVariant);
            },
            error: function() {
                alert('Có lỗi xảy ra trong quá trình gửi yêu cầu.');
            }
        });
    }
</script>

</body>
</html>
