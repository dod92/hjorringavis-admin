<div>
    <ul class="uk-breadcrumb">
        <li><a href="@route('/editor-formats')">@lang('Editor Formats')</a></li>
        <li class="uk-active"><span>@lang('Editor Format')</span></li>
    </ul>
</div>

<div class="uk-margin-top" riot-view>
    <form id="account-form" class="uk-form uk-grid uk-grid-gutter" onsubmit="{ submit }">

        <div class="uk-width-medium-1-4">
            <div class="uk-panel uk-panel-box uk-panel-card">

                <div class="uk-margin">
                    <label class="uk-text-small">@lang('Name')</label>
                    <input class="uk-width-1-1 uk-form-large" type="text" ref="name" bind="format.name" pattern="[a-zA-Z0-9_]+" required="">
                    <p class="uk-text-small uk-text-muted"> @lang('Only alpha nummeric value is allowed') </p>
                </div>

                <div class="uk-margin">
                    <label class="uk-text-small">@lang('Description')</label>
                    <textarea class="uk-width-1-1 uk-form-large" name="description" bind="format.description" bind-event="input" rows="5"></textarea>
                </div>

            </div>
        </div>

        <div class="uk-width-medium-3-4">

            <div class="uk-form-row">
                <div class="uk-margin">
                    <label class="uk-text-small">@lang('Editor settings')</label>
                </div>
                <div class="uk-panel uk-panel-box uk-panel-card">
                    <div class="uk-grid">
                        <div>
                            <label class="uk-text-small">@lang('Height')</label>
                            <input class="uk-width-1-1 uk-form-large" type="text" ref="name" bind="format.height" pattern="[0-9]+" required="">
                            <p class="uk-text-small uk-text-muted"> @lang('Only nummeric value is allowed') </p>
                        </div>

                        <div>
                            <label class="uk-text-small">@lang('Editor Resize')</label>
                            <p>
                                <field-boolean bind="format.resize" title="@lang('Resize')" label="@lang('Resize')"></field-boolean>
                            </p>
                        </div>

                        <div>
                            <label class="uk-text-small">@lang('Force Absolute Urls')</label>
                            <p>
                                <field-boolean bind="format.absolute_urls" title="@lang('Absolute Urls')" label="@lang('Absolute Urls')"></field-boolean>
                            </p>
                        </div>

                        <div>
                            <label class="uk-text-small">@lang('Show Branding')</label>
                            <p>
                                <field-boolean bind="format.branding" title="@lang('Show Tinymce branding')" label="@lang('Branding')"></field-boolean>
                            </p>
                        </div>

                    </div>
                </div>
            </div>


            <div class="uk-form-row">
                <div class="uk-margin">
                    <label class="uk-text-small">@lang('Menu Items')</label>
                </div>
                <div class="uk-panel uk-panel-box uk-panel-card">
                    <div class="uk-grid uk-grid-small">
                        <div class="uk-margin-top" each="{ state, name in format.menubar }">
                            <field-boolean bind="format.menubar.{name}" title="{name}" label="{name}"></field-boolean>
                        </div>
                    </div>
                    <p class="uk-text-small uk-text-muted"> @lang('If all options are disabled no menu will be displayed at all.') </p>
                </div>
            </div>

            <div class="uk-form-row">
                <div class="uk-margin">
                    <label class="uk-text-small">@lang('Toolbar buttons')</label>
                </div>
                <div class="uk-panel uk-panel-box uk-panel-card">
                    <div class="uk-grid uk-grid-small">
                        <textarea class="uk-width-1-1 uk-form-small" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" type="text" ref="name" bind="format.toolbar" pattern="[a-zA-Z |]+" required="required" rows="2"></textarea>
                    </div>
                    <p class="uk-text-small uk-text-muted"> @lang('Set the toolbar buttons using the available tokens. Use | as a separator between buttons.') </p>
                    <span class="uk-text-small uk-text-muted">List of available tokens:</span>
                    <div class="uk-text-small uk-text-muted uk-grid uk-grid-small uk-panel-box">
                        <span class="field-tag" each="{ item in toolbar }">{item}</span>
                    </div>
                </div>
            </div>

            <div class="uk-form-row">
                <div class="uk-margin">
                    <label class="uk-text-small">@lang('Block Formats')</label>
                </div>
                <div class="uk-panel uk-panel-box uk-panel-card">
                    <div class="uk-grid uk-grid-small">
                        <field-boolean class="uk-margin-top" bind="format.blocks.p" title="{blocks.p}" label="{blocks.p}"></field-boolean>
                        <field-boolean class="uk-margin-top" bind="format.blocks.h1" title="{blocks.h1}" label="{blocks.h1}"></field-boolean>
                        <field-boolean class="uk-margin-top" bind="format.blocks.h2" title="{blocks.h2}" label="{blocks.h2}"></field-boolean>
                        <field-boolean class="uk-margin-top" bind="format.blocks.h3" title="{blocks.h3}" label="{blocks.h3}"></field-boolean>
                        <field-boolean class="uk-margin-top" bind="format.blocks.h4" title="{blocks.h4}" label="{blocks.h4}"></field-boolean>
                        <field-boolean class="uk-margin-top" bind="format.blocks.h5" title="{blocks.h5}" label="{blocks.h5}"></field-boolean>
                        <field-boolean class="uk-margin-top" bind="format.blocks.h6" title="{blocks.h6}" label="{blocks.h6}"></field-boolean>
                        <field-boolean class="uk-margin-top" bind="format.blocks.pre" title="{blocks.pre}" label="{blocks.pre}"></field-boolean>
                    </div>
                    <p class="uk-text-small uk-text-muted"> @lang('It only applies when "format menu" or "formatselect toolbar button" are enabled.') </p>
                </div>
            </div>

            <div class="uk-form-row">
                <div class="uk-margin">
                    <label class="uk-text-small">@lang('Plugins')</label>
                </div>
                <div class="uk-panel uk-panel-box uk-panel-card">
                    <div class="uk-grid uk-grid-small">
                        <div class="uk-margin-top" each="{ state, name in format.plugins }">
                            <field-boolean bind="format.plugins.{name}" title="{name}" label="{name}"></field-boolean>
                        </div>
                    </div>
                    <p class="uk-text-small uk-text-muted"> @lang('Some plugins are related to a menuitem or toolbar button.') </p>
                </div>
            </div>

            <div class="uk-margin-large-top">
                <button class="uk-button uk-button-large uk-width-1-3 uk-button-primary uk-margin-right">@lang('Save')</button>
                <a href="@route('/editor-formats')">@lang('Cancel')</a>
            </div>
        </div>

    </form>


    <script type="view/script">

        var $this = this;

        this.mixin(RiotBindMixin);

        this.format = {{ json_encode($format) }};

        this.toolbar = ["formatselect", "undo", "redo", "pastetext", "selectall", "bold", "italic", "subscript", "superscript", "strikethrough", "underline", "forecolor", "backcolor", "alignleft", "aligncenter", "alignright", "anchor", "link", "unlink", "anchor", "numlist", "bullist", "blockquote", "indent", "outdent", "image", "media", "code", "removeformat", "fullscreen", "ltr", "rtl", "toc", "tocupdate", "searchreplace", "preview"];

        this.blocks = {
            p: "Paragraph",
            h1: "Header 1",
            h2: "Header 2",
            h3: "Header 3",
            h4: "Header 4",
            h5: "Header 5",
            h6: "Header 6",
            pre: "Pre"
        };

        this.on('update', function(){
            if (this.format._id) {
                this.refs.name.disabled = true;
            }
        });

        this.on('mount', function() {
            this.trigger('update');
            // bind clobal command + save
            Mousetrap.bindGlobal(['command+s', 'ctrl+s'], function(e) {
                e.preventDefault();
                $this.submit();
                return false;
            });
        });

        submit(e) {
            if(e) e.preventDefault();

            App.callmodule('editorformats:saveFormat', [this.format.name, this.format]).then(function(data) {
               if (data.result) {
                   App.ui.notify("Saving successful", "success");
                   $this.format = data.result;
                   $this.update();
                } else {
                    App.ui.notify("Saving failed.", "danger");
                }
            });
        }

    </script>

</div>
