<template>
  <div>
      <div v-if="!isVisible">
        <p @click="toggle" class="stories__block--sm-text cursor-pointer text-yellow hover:text-green transition-all inline-block">
          {{ closedtext }}
        </p>
      </div>
    <div v-cloak v-if="isVisible" class="accordion-content">
        <p @click="toggle" class="stories__block--sm-text cursor-pointer text-yellow hover:text-red transition-all">
          {{ openedtext }}
        </p>
        <div class="animated fadeIn slow">
          <slot></slot>
        </div>
    </div>
  </div>
</template>

<script>
    export default {
        props: ['openedtext', 'closedtext'],
        data: () => ({
            isVisible: false
        }),
        methods: {
            toggle() {
                this.isVisible = !this.isVisible;
            }
        }
    }
</script>

