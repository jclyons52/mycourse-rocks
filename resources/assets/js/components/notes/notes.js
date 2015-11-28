export default {

    template: require('./notes.html'),

    data () {
       return {
           notes: [],
           newNote: ''
        }
    },

    props: ['lesson_id'],

    ready: function () {
        var that = this;

        this.$http.get("/api/notes?lesson_id="+this.lesson_id, function (data) {
            var notes_data = data.data;
            for (var i = 0; i < notes_data.length; i++) {
                that.notes.push({
                    body: notes_data[i].body
                });
            }
        });
    },

    methods: {


        addNote: function (e) {
            e.preventDefault();

            if (!this.newNote) return;

            this.notes.push({
                body: this.newNote
            });

            this.$http.post(
                '/api/notes',
                {
                    body: this.newNote,
                    lesson_id: this.lesson_id,
                    _token: token
                }).success(
                function (data) {
                    console.log(data);
                }
            );

            this.newNote = '';


        },
        removeNote: function (note) {
            this.notes.$remove(note);

        }
    }
}