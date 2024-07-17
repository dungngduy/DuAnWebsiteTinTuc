import { defineStore } from 'pinia'

export const useMenu = defineStore('storeId', {
  // arrow function recommended for full type inference
  state: () => {
    return {
      selectedKeys: [],
      openKeys: [],
    }
  },

  actions: {
    onSelectedKeys(data){
        this.selectedKeys = data;
    },

    onOpenKeys(data){
        this.openKeys = data;
    }
  }
})
