<template>
  <div>
    {{ description }}
      <div>
    <ul v-if="posts && posts.length">
      <li :key="post" v-for="post of posts">
        <p><strong>{{post.title}}</strong></p>
        <p>{{post.body}}</p>
      </li>
    </ul>

    <ul v-if="errors && errors.length">
      <li :key="error" v-for="error of errors">
        {{error.message}}
      </li>
    </ul>
  </div>
  </div>
</template>

<script lang="ts">
import axios from 'axios';

export default {
  name: "AppGreet",
  data() {
    return {
        description: "Welcome to CakePHP + Vue.js world! (maybe Typescript)" as String,
        posts: [] as Array<string>,
        errors: [] as Array<string>
    };
  },
  created() {
    axios.get(`http://jsonplaceholder.typicode.com/posts`)
    .then(response => {
      // JSON responses are automatically parsed.
      this.posts = response.data
    })
    .catch(e => {
      this.errors.push(e)
    })
  }
}
</script>