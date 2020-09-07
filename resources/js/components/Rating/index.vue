<template>
    <article class="ratin">
        <div class="star-rating">
            <label
                class="star-rating__star"
                v-for="(rating, index) in ratings"
                :key="index"
                :class="{'is-selected': ((value >= rating) && value != null), 'is-disabled': disabled}"
                v-on:click="set(rating)" v-on:mouseover="star_over(rating)" v-on:mouseout="star_out">
                <input
                    class="star-rating star-rating__checkbox"
                    type="radio"
                    :value="rating"
                    :name="name"
                    v-model="value"
                    :disabled="disabled">
                    <span>★</span>
            </label>
        </div>
    </article>
</template>

<script>
    export default {
        props: {
            'name': String,
            'value': null,
            'id': String,
            'disabled': Boolean,
            'required': Boolean
        },
        data() {
            return {
                temp_value: null,
                ratings: [1, 2, 3, 4, 5]
            }
        },
        methods: {
            star_over: function(index) {

                if (!this.disabled) {
                    this.temp_value = this.value;
                    return this.value = index;
                }

            },
            star_out: function() {

                if (!this.disabled) {
                    return this.value = this.temp_value;
                }
            },
            set: function(value) {

                if (!this.disabled) {
                    this.temp_value = value;
                    return this.value = value;
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/_variables';

    article.ratin {
        position: relative;

        %visually-hidden {
            position: absolute;
            overflow: hidden;
            clip: rect(0 0 0 0);
            height: 1px; width: 1px;
            margin: -1px; padding: 0; border: 0;
        }

        .star-rating {
            &__star {
                display: inline-block;
                padding: 3px;
                vertical-align: middle;
                line-height: 1;
                font-size: 1.5em;
                color: #ABABAB;
                transition: color .2s ease-out;
                margin: 0;

                &:hover {
                    cursor: pointer;
                }

                &.is-selected {
                    color: map-get($theme-colors, secondary);
                }

                &.is-disabled:hover {
                    cursor: default;
                }
            }

            &__checkbox {
                @extend %visually-hidden;
            }
        }
    }
</style>
