<template>
    <article class="car-box">
        <div class="car-box-content">
            <span
                class="badge badge-primary text-light d-inline-block">
                Activo
            </span>
            <h3 class="text-primary">{{ data.alias }}</h3>
            <small>{{ data.created_at }}</small>
            <p><strong>Propietario:</strong> {{ data.user.first_name + ' ' + data.user.last_name }}</p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <article class="car-detail">
                        <strong class="text-dark">Placa:</strong>
                        <p>{{ data.plate }}</p>
                    </article>
                </li>
                <li class="list-group-item">
                    <article class="car-detail">
                        <strong class="text-dark">Marca:</strong>
                        <p>{{ data.brand }}</p>
                    </article>
                </li>
                <li class="list-group-item">
                    <article class="car-detail">
                        <strong class="text-dark">Modelo:</strong>
                         <p>{{ data.model }}</p>
                    </article>
                </li>
            </ul>
        </div>
        <div class="car-box-footer d-none">
            <div class="car-actions">
                <div class="d-flex">
                     <button
                        class="btn bg-primary text-white text-uppercase btn-sm btn-block">Eliminar</button>
                </div>
            </div>
        </div>
    </article>
</template>

<script>
    export default {
        props: {
            data: Object
        }
    }
</script>
