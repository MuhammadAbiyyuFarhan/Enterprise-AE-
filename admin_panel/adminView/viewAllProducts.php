<div>
  <h2>List Product</h2>
  <div class="row">
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT product.*, product.BOM AS bom_link 
            FROM product 
            LEFT JOIN project ON product.project_id = project.project_id";
      $result=$conn->query($sql);
      if ($result->num_rows > 0){
        while ($row=$result->fetch_assoc()) {
    ?>
    
    <div class="col-md-4 mb-4">
      <div class="card" onclick="showDescription('<?= $row["product_desc"] ?>', '<?= $row["product_name"] ?>', '<?= $row["BOM"] ?>')">
        <div class="product">
          <div class="card-body">
            <h5 class="card-title"><?= $row["product_name"] ?></h5>
            <img src="<?= $row["product_image"] ?>" class="card-img-top" alt="<?= $row["product_name"] ?>">
            <div class="Harga">
              <p class="card-text"><strong>Rp. </strong> <?= number_format($row["price"], 0, ',', '.') ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
        }
      }
    ?>
  </div>

  <!-- Bootstrap Modal for Description -->
<div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="descriptionModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="descriptionModalBody"></div>
      <div class="modal-footer">
        <a href="#" id="bomLink" class="btn btn-primary" target="_blank">Bill Of Material</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- JavaScript to show description -->
<script>
  function showDescription(description, productName, bomLink) {
    var modalTitle = document.getElementById("descriptionModalLabel");
    modalTitle.innerText = productName;
    var modalBody = document.getElementById("descriptionModalBody");
    modalBody.innerText = description;
    var bomLinkElement = document.getElementById("bomLink");
    bomLinkElement.setAttribute("href", bomLink);
    $('#descriptionModal').modal('show');
  }
</script>

</div>


  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Product
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Product Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="addItems()" method="POST">
            <div class="form-group">
              <label for="name">Product Name:</label>
              <input type="text" class="form-control" id="p_name" required>
            </div>
            <div class="form-group">
              <label for="name">Bill Of Material:</label>
              <input type="text" class="form-control" id="p_bom" required>
            </div>
            <div class="form-group">
              <label for="price">Price:</label>
              <input type="number" class="form-control" id="p_price" required>
            </div>
            <div class="form-group">
              <label for="qty">Description:</label>
              <input type="text" class="form-control" id="p_desc" required>
            </div>
            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" id="file">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Item</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</script>