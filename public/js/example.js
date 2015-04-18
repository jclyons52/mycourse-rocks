
var Comment = React.createClass({
    render: function() {
    var rawMarkup = marked(this.props.children.toString(), {sanitize: true});

    return (
        <div className="comment">
    <h2 className="commentAuthor">
    {this.props.author}
</h2>
<span dangerouslySetInnerHTML={{__html: rawMarkup}} />
</div>
);
}
});

var CommentBox = React.createClass({
    loadCommentsFromServer: function() {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
        $.ajax({
            url: this.props.url,
            dataType: 'json',
            success: function(data) {
            this.setState({data: data.data});
        }.bind(this),
        error: function(xhr, status, err) {
            console.error(this.props.url, status, err.toString());
        }.bind(this)
    });
},
handleCommentSubmit: function(comment) {
    var comments = this.state.data;
    comments.push(comment);
    this.setState({data: comments}, function() {
        // `setState` accepts a callback. To avoid (improbable) race condition,
        // `we'll send the ajax request right after we optimistically set the new
        // `state.
        $.ajax({
            url: this.props.url,
            dataType: 'json',
            type: 'POST',
            data: comment,
            success: function(data) {
                this.setState({data: data.data});
            }.bind(this),
            error: function(xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    });
},
getInitialState: function() {
    return {data: []};
},
componentDidMount: function() {
    this.loadCommentsFromServer();
    setInterval(this.loadCommentsFromServer, this.props.pollInterval);
},
render: function() {
    return (
        <div className="commentBox">
    <h1>Comments</h1>
                <CommentForm onCommentSubmit={this.handleCommentSubmit} />
    <CommentList data={this.state.data} />

</div>
);
}
});

var CommentList = React.createClass({
        render: function() {
            var commentNodes = this.props.data.map(function(comment, index) {
                return (
                        // `key` is a React-specific concept and is not mandatory for the
                        // purpose of this tutorial. if you're curious, see more here:
                        // http://facebook.github.io/react/docs/multiple-components.html#dynamic-children
                    <Comment author={comment.author} key={index}>
            {comment.content}
        </Comment>
);
});
return (
    <div className="commentList">
{commentNodes}
</div>
);
}
});

var CommentForm = React.createClass({
    handleSubmit: function(e) {
    e.preventDefault();
    var author = React.findDOMNode(this.refs.author).value.trim();
    var text = React.findDOMNode(this.refs.text).value.trim();
    if (!text || !author) {
        return;
    }
    this.props.onCommentSubmit({author: author, text: text});
    React.findDOMNode(this.refs.author).value = '';
    React.findDOMNode(this.refs.text).value = '';
},
render: function() {
    return (
        <form className="commentForm" onSubmit={this.handleSubmit}>
<input type="text" placeholder="Say something..." ref="text" className="form-control"/>
<input type="submit" value="Post" className="btn btn-primary"/>
</form>
);
}
});

React.render(
<CommentBox url="api/comments" pollInterval={2000} />,
    document.getElementById('content')
);
