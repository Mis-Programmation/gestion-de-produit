<?php /** @var \MIS\Domain\Product\Entity\ProductEntity $product */  $product; ?>
<div class="container-fluid" >
    <div class="row" >
        <div class="col-8 offset-2 mt-5" >
            <div class="card ">
                <h3 class="card-header text-center text-white bg-success">Ajouter un produit</h3>
                <div class="card-body">
                    <form method="POST" >
                        <div class="form-group"  >
                            <label for="ref">Ref</label>
                            <input type="text" required class="form-control shadow-sm" value="<?= isset($product) ? $product->getRef() : ""  ?>"  name="Product[ref]" id="ref">
                        </div>
                        <div class="form-group"  >
                            <label for="name">Name</label>
                            <input type="text" required class="form-control shadow-sm" value="<?= isset($product) ? $product->getName() : ""  ?>"  name="Product[name]" id="name">
                        </div>
                        <div class="form-group" >
                            <label for="stock">Stock</label>
                            <input type="number" required class="form-control shadow-sm"  value="<?= isset($product) ? $product->getStock() : ""  ?>" name="Product[stock]" id="stock" >
                        </div>
                        <button type="submit" class="btn btn-success rounded-pill" ><?= $btnName ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
