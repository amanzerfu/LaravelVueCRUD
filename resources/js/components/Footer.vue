<template>
    <div class="footer">
      <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright © {{ currentYear }} All rights reserved
        <i class="icon-heart" aria-hidden="true"></i> by
        <a href="https://colorlib.com" target="_blank">Amanuwel</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        currentYear: new Date().getFullYear()
      };
    }
  };
  </script>
  
  <style>
  /* Your component-specific styles here */
  </style>
  