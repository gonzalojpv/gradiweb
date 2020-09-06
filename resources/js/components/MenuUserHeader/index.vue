<template>
    <div class="btn-group user-menu-header">
        <button
            type="button"
            class="btn btn-primary dropdown-toggle"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false">
        </button>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header"><strong>Hi {{ user.first_name }}</strong></div>
            <router-link
                class="dropdown-item active"
                :to="{ name: 'account.edit' }">
                Edit Account
            </router-link>
            <div class="dropdown-divider"></div>
            <router-link
                class="dropdown-item"
                :to="{ name: 'logout' }">Logout</router-link>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: Object
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';

    div.user-menu-header {

        button.btn {
            height: 3rem;
            width: 3rem;
            border-radius: 50%;
            outline: 0;
            box-shadow: none;

            &::after {
                display: none;
            }
        }

        div.dropdown-menu {
            border: none;
            box-shadow: 0 5px 5px -3px rgba(39,44,51,.1), 0 8px 10px 1px rgba(39,44,51,.04), 0 3px 14px 2px rgba(39,44,51,.02);

            &::before {
                top: calc(-8px + -.5rem);
                opacity: 1;
                border: 8px solid transparent;
                border-bottom-color: #fff;
                content: " ";
                height: 0;
                width: 1px;
                position: absolute;
                transition: opacity .1s cubic-bezier(.3,.5,.5,1);
                left: auto;
                right: 10px;
            }

            .dropdown-item {
                color: rgba(39,44,51,.7);
                font-size: 0.875rem;

                &.active,
                &:hover {
                    color: map-get($theme-colors, dark);
                    font-weight: 700;
                    background-color: transparent;
                    position: relative;

                    &::after {
                        position: absolute;
                        left: -1px;
                        top: 0;
                        bottom: 0;
                        width: 4px;
                        border-radius: 1px;
                        background-color: map-get($theme-colors, primary);
                        content: "";

                    }
                }
            }
        }
    }
</style>
