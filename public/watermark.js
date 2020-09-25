var vm = new Vue({
    el: '#Watermark',
    mounted: function () {
        WebViewer({
            initialDoc: 'https://url/to/my_file.docx',
        }, this.$refs.viewer).then(instance => {
            const { docViewer } = instance;

            docViewer.setWatermark({
                // Draw diagonal watermark in middle of the document
                diagonal: {
                    fontSize: 25, // or even smaller size
                    fontFamily: 'sans-serif',
                    color: 'red',
                    opacity: 50, // from 0 to 100
                    text: 'Watermark'
                },

                // Draw header watermark
                header: {
                    fontSize: 10,
                    fontFamily: 'sans-serif',
                    color: 'red',
                    opacity: 70,
                    left: 'left watermark',
                    center: 'center watermark',
                    right: ''
                }
            });
        });
    },
});
