import { defineStore } from "pinia";
import { ref, reactive, computed } from "vue";

//step 1 : options api style setup

/*const counterStore = defineStore({
  id: "counter",
  state: () => ({
    count: 16,
  }),
  getters: {
    // doubleCount: function (state) {
    //   return state.count * 2;
    // },
    doubleCount: (state) => state.count * 2,
  },
  actions: {
    increment() {
      this.count++;
    },
  },
});*/

//step 2 : composition api style setup

const counterStore = defineStore("counter", () => {
  const count = ref(16);
  const doubleCount = computed(() => count.value * 2);
  const increment = () => count.value++;
  return {
    count,
    doubleCount,
    increment,
  };
});

export { counterStore };
