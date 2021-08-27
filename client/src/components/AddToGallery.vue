<template>
  <form>
    <div class="mb-3">
      <label for="image_to_gallery">Зображення для галереї</label>
      <div class="input-group">
        <input class="form-control" name="image" id="image_to_gallery">
        <label class="btn btn-primary">Вибрати зображення
          <input type="file" hidden @change="upload($event.target.files)">
        </label>
      </div>
    </div>
  </form>
</template>

<script lang="ts">
import axios from "axios";
import {SetupContext} from "vue";
import {useRoute} from "vue-router";

export default {
  name: "AddToGallery",
  emits: ['upload_gallery'],
  setup(_: any, context: SetupContext) {
    let projectId: string;
    const route = useRoute();
      projectId = route.params.id[0]
    const upload = async (files: FileList | null) => {
      if (files === null) return;
      const file = files[0];
      const formData = new FormData();
      formData.append('image', file);
      formData.append('project_id', projectId);
      const {data} = await axios.post('gallery-image', formData);
      context.emit('upload_gallery', data.url);
    }
    return {
      upload,
      projectId
    }
  }
}
</script>

