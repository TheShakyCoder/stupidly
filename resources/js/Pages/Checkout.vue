<script setup>
import { Form } from '@inertiajs/vue3'
import { onMounted } from 'vue';

defineProps({
    months: {
        type: Array,
        default: []
    }
})

var stripe = Stripe('pk_test_6pRNASCoBOKtIshFeQd4XMUh');
let elements = null
let card = null

onMounted(() => {
    elements = stripe.elements()
    card = elements.create('card');
    card.mount('#card-element');
})

</script>

<template>
    <Form action="/checkout" method="post" id="payment-form">

        <div class="">
            <label for="card-element">
                Credit or debit card
            </label>
            <div id="card-element">
                <!-- a Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors -->
            <div id="card-errors"></div>
        </div>
        <input type="submit" class="submit" value="Submit Payment">
    </Form>
</template>

<style lang="scss" scoped></style>
