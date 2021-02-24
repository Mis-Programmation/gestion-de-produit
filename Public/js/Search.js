const searchInput = document.getElementById('query');
const form = document.getElementById('form');
let tb = document.getElementById('tb');

let tableInitial = tb.cloneNode(true).children;
/**
 * Callback du fonction (pour les evenements click)
 * @param event
 */
const callback = (event) => {

    if(searchInput.value.trim() !== ""){
       let datas = [];
        fetchProduct(searchInput.value)
        .then(response => {
            response.data.map((item,index) => {
                datas.push(display(item))

                tb.innerHTML = datas;
            });
        })
        .catch(error => {

        } )

    }else {
        let table = [] ;
       for (let i = 0 ; i < tableInitial.length ; i++){
           table.push( `<tr> ${tableInitial[i].innerHTML} </tr>`);
       }
        tb.innerHTML = table;
    }
}

/**
 *
 * @param myNode
 */
function erase_childs(myNode) {

    while (myNode.firstChild) {
        myNode.removeChild(myNode.lastChild);
    }

}

/**
 * Permet d'affichier les item trouver
 * @param item
 *
 */
const display = (item) => {

  return `<tr>
        <th scope="row">${item.ref}</th>
        <td>${item.name}</td>
        <td>${item.stock}</td>
        
        <td class="btn-group" >
            <a href="/admin/product/edit/${item.id}" class="btn btn-warning" >Edit</a>
            <a id="deleteBtn" href="/admin/product/delete/${item.id}"
            class="btn btn-danger" >Supprimer</a>
        </td>
    </tr>`


}

/**
 *
 * @param query
 * @return {*}
 */
 const fetchProduct = async (query) => {
    return  await axios.get('/api/search/'+searchInput.value)
 }

searchInput.addEventListener('keyup',callback);
form.addEventListener('submit',(event) => {
    event.preventDefault();
});
