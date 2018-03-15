<div class="row">
  <div class="col-sm-3">
    <form class="addProductForm" method="post">
      <input type="hidden" name="productID" id="productID" value="">
      <div class="form-group">
        <label>Product Code</label>
        <input type="text" id="product_code" name="product_code" class="form-control">
      </div>
      <div class="form-group">
        <label>Product Name</label>
        <input type="text" id="product_name" name="product_name" class="form-control">
      </div>
      <div class="form-group">
        <label>Product Description</label>
        <textarea id="product_desc" name="product_desc" class="form-control" rows="4"></textarea>
      </div>
      <div class="form-group">
        <label>Product Price</label>
        <input type="number" id="product_price" name="product_price" class="form-control">
      </div>
      <div class="form-group">
        <label>Product Stock</label>
        <input type="number" id="product_stock" name="product_stock" class="form-control">
      </div>
      <div class="form-group">
        <label>Product Image</label>
        <input type="file" id="product_img" name="product_img" class="form-control">
      </div>

      <div align="right">
        <button type="button" class="btn btn-danger themeBtn hideIt" id="cancel">Cancel</button>
        <button type="button" class="btn btn-warning themeBtn" id="resetProductBtn">Clear</button>
        <button type="submit" class="btn btn-success themeBtn" id="addProductBtn">Save</button>
      </div>
    </form>
  </div>
  <div class="col-sm-9">
    <div class="products-list"></div>
  </div>
</div>
