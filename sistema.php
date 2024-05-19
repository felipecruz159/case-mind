<main class="container mt-5 table-responsive" id="listagem">
    <div class="d-flex justify-content-between">
        <h2>Produtos</h2>
        <a href="cadastro_produtos.php"><button class="btn text-light">Cadastrar +</button></a>
    </div>
    <table class="table table-striped table-dark border mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Qtd</th>
                <th scope="col">Descrição</th>
                <th scope="col">Foto</th>
                <th scope="col" colspan="3" class="text-center" style="width: 64px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Ana </td>
                <td>10</td>
                <td class="descricao">Descrição do item Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium expedita maxime at excepturi quidem nesciunt optio libero soluta hic, doloribus odit magnam dicta saepe quibusdam, ipsa vero fuga quae dolore.</td>
                <td><img src="assets/images/mind.png" alt="Foto"></td>
                <td class="text-center">
                    <div class="d-flex gap-1 justify-content-center">
                        <a href="#"><span class="btn btn-primary material-symbols-outlined" title="balanço">swap_vert</span></a>
                        <a href="#"><span class="btn btn-primary material-symbols-outlined" title="editar">edit_square</span></a>
                        <a href="#" title="excluir"><span class="btn btn-danger material-symbols-outlined">delete</span></a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</main>