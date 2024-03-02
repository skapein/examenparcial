<?php require_once('../html/head2.php')  ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Basic Bootstrap Table -->
<div class="card">
    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#ModalLibros">Nuevo libro</button>


    <h5 class="card-header">Lista de Libros</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Genero</th>
                    <th>Año_publicación</th>
                    <th>Editorial</th>

                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ListaLibros">

            </tbody>
        </table>
    </div>
</div>


<!-- Modal Usuarios-->
<style>
    .swal2-container {
        z-index: 999999;
    }
</style>

<div class="modal" tabindex="-1" id="ModalLibros">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal">Insertar Libros</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_autor" method="post">
                <input type="hidden" name="ID_libro" id="ID_libro">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Título">Título</label>
                        <input type="text" name="Nombre" id="Nombre" class="form-control"  placeholder="Ingrese el título del libro" required>

                    </div>
                    <div class="form-group">
                        <label for="Género"></label>
                        <input type="date" id="Género" name="Género" class="form-control" placeholder="Ingrese el género del libro" required>
                    </div>
                    <div class="form-group">
                        <label for="Año_publicación">Año_publicació</label>
                        <input type="text" name="Año_publicació" id="Año_publicació" class="form-control" placeholder="Ingrese el año de publicación del libro" required>
                    </div>
                    <div class="form-group">
                        <label for="Editorial">Editorial</label>
                        <input type="text" name="editorial" id="editorial" class="form-control" placeholder="Ingrese la editorial del libro" required>
                    </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>






<?php require_once('../html/scripts2.php') ?>

<script src="./libro.js"></script>



<!--<tr>
    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
    <td>Albert Cook</td>
    <td>
        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
            </li>
        </ul>
    </td>
    <td><span class="badge bg-label-primary me-1">Active</span></td>
    <td>
        <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
            </div>
        </div>
    </td>
</tr>-->
<!--<tr>
    <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React Project</strong></td>
    <td>Barry Hunter</td>
    <td>
        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
            </li>
        </ul>
    </td>
    <td><span class="badge bg-label-success me-1">Completed</span></td>
    <td>
        <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Delete</a>
            </div>
        </div>
    </td>
</tr>-->
<!--<tr>
    <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>VueJs Project</strong></td>
    <td>Trevor Baker</td>
    <td>
        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
            </li>
        </ul>
    </td>
    <td><span class="badge bg-label-info me-1">Scheduled</span></td>
    <td>
        <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Delete</a>
            </div>
        </div>
    </td>
</tr>-->
<!--<tr>
    <td>
        <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap Project</strong>
    </td>
    <td>Jerry Milton</td>
    <td>
        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
            </li>
            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
            </li>
        </ul>
    </td>
    <td><span class="badge bg-label-warning me-1">Pending</span></td>
    <td>
        <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Editar</a>
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Eliminar</a>
            </div>
        </div>
    </td>
</tr>-->