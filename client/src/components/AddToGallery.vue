<template>
  <form>
    <div class="mb-3">
      <label for="image_to_gallery">Зображення для галереї</label>
      <div class="input-group">
        <input class="form-control" name="image_preview" id="image_to_gallery">
        <label class="btn btn-primary">Вибрати зображення
          <input type="file" hidden>
        </label>
      </div>
    </div>
  </form>
</template>

<script lang="ts">
import axios from "axios";
import {SetupContext} from "vue";

export default {
  name: "AddToGallery",
  emits: ['uploaded'],
  setup(_: any, context: SetupContext) {
    const upload = async (files: FileList | null) => {
      if (files === null) return;
      const file = files[0];
      const formData = new FormData();
      formData.append('image_preview', file);

      const {data} = await axios.post('file-store', formData);
      context.emit('uploaded', data.url);
    }
    return {
      upload
    }
  }
}
</script>

