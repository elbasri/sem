			// the blur event may get fired even when focusing
							// inside the window itself, so we must ensure the
							// target is out of it.
							var target;
							if ( CKEDITOR.env.ie && !this.allowBlur()
								 || ( target = ev.data.getTarget() )
								      && target.getName && target.getName() != 'iframe' )
								return;

							if ( this.visible && !this._.activeChild && !isShowing )
								this.hide();
						},
						this );

					focused.on( 'focus', function()
						{
							this._.focused = true;
							this.hideChild();
							this.allowBlur( true );
						},
						this );

					CKEDITOR.event.useCapture = false;

					this._.blurSet = 1;
				}

				panel.onEscape = CKEDITOR.tools.bind( function( keystroke )
					{
						if ( this.onEscape && this.onEscape( keystroke ) === false )
							return false;
					},
					this );

				CKEDITOR.tools.setTimeout( function()
					{
						if ( rtl )
							left -= element.$.offsetWidth;

						var panelLoad = CKEDITOR.tools.bind( function ()
						{
							var target = element.getFirst();

							if ( block.autoSize )
							{
								// We must adjust first the width or IE6 could include extra lines in the height computation
								var widthNode = block.element.$;

								if ( CKEDITOR.env.gecko || CKEDITOR.env.opera )
									widthNode = widthNode.parentNode;

								if ( CKEDITOR.env.ie )
									widthNode = widthNode.document.body;

								var width = widthNode.scrollWidth;
								// Account for extra height needed due to IE quirks box model bug:
								// http://en.wikipedia.org/wiki/Internet_Explorer_box_model_bug
								// (#3426)
								if ( CKEDITOR.env.ie && CKEDITOR.env.quirks && width > 0 )
									width += ( target.$.offsetWidth || 0 ) - ( target.$.clientWidth || 0 );
								// A little extra at the end.
								// If not present, IE6 might break into the next line, but also it looks better this way
								width += 4 ;

								target.setStyle( 'width', width + 'px' );

								// IE doesn't compute the scrollWidth if a filter is applied previously
								