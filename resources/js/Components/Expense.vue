<template>
    <div class="min-w-[350px] mb-4 mx-2 p-4 bg-white rounded shadow border flex-1 cursor-pointer" @click="open(expense)">
        <div class="flex justify-between">
            <h3 class="text-xl">{{ expense.name }}</h3>
            <h4 class="text-lg text-green-800">{{ expense.amount }}</h4>
        </div>
        <div class="text-gray-500 italic">{{ expense.description }}</div>

        <div class="flex justify-between">
            <div>&nbsp;</div>
            <label  :for="'status- '+ expense.id" class="switch">
                <input type="checkbox" :id="'status- '+expense.id" :checked="expense.active" @change="toogleEnabled(expense)">
                <span class="slider"></span>
              </label>
        </div>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';


const props = defineProps({
    expense: Object
})

function open(expense) {
    router.visit('/expenses/' + expense.id)
}

function toogleEnabled(expense){
    router.visit('/expenses/toggle/' +expense.id , {
        method:'post',
        preserveScroll:true
    })
}

</script>

<style scoped>
/* The switch - the box around the slider */
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }

  /* Hide default HTML checkbox */
  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  /* The slider */
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #eebdbd;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #2196F3;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>
