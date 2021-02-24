
<div class="container" style="margin-top: 70px !important;"  >

    <div id="card" class="card rounded-0 h-100 shadow" >
            <div class="col-md-4 offset-8 ">
                <form id="form" method="get" action="#">
                    <label for="query"></label>
                    <input type="text" placeholder="recherche" id="query" name="query" class="form-control bg-light border-success" >
                </form>
            </div>
        <table id="table" class="table table-hover text-center mt-5 ">
            <thead id="th" >
            <tr>
                <th scope="col">ref</th>
                <th scope="col">designation</th>
                <th scope="col">stock</th>
                <th scope="col" >Action</th>
            </tr>
            </thead>
            <tbody id="tb" >
            <?php
            /** @var \MIS\Domain\Product\Entity\ProductEntity $product */
            foreach ($products as $product) :
                ?>
                <tr >
                    <th scope="row"> <?= htmlentities( $product->getRef()) ?>  </th>
                    <td><?= htmlentities($product->getName()) ?></td>
                    <td><?= htmlentities($product->getStock()) ?></td>
                    <td class="btn-group" >
                        <a href="/admin/product/edit/<?= $product->getId() ?>" class="btn btn-warning" >Edit</a>
                        <a id="deleteBtn" href="/admin/product/delete/<?= $product->getId() ?>"
                           class="btn btn-danger" >Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="p-2" >
            <a href="/admin/product/add" class="btn col-2 btn-success" >Ajouter un produit</a>
        </div>
    </div>

</div>

<script>
    const deleteBtn = document.getElementById('deleteBtn');

    deleteBtn.addEventListener('click',(e) => {
        if(!confirm("Voullez vous supprimer ce produit")){
            e.preventDefault();
        }
    })
</script>

<script src="/js/Axios.js" ></script>
<script src="/js/Search.js" ></script>
