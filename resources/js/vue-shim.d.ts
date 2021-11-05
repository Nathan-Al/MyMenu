// Code found on stackoverflow, how do it's work ? I don't know.
// https://stackoverflow.com/questions/42002394/importing-vue-components-in-typescript-file
declare module "*.vue" {
    import Vue from 'vue'
    export default Vue
}
