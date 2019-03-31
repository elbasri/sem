c on this, but it works.
									if ( CKEDITOR.env.ie8Compat )
										left -= element.getDocument().getDocumentElement().$.scrollLeft * 2;
									else
										left -= ( offsetParent.$.scrollWidth - offsetParent.$.clientWidth );
								}
							}

							// Trigger the onHide event of the previously active panel to prevent
							// incorrect styles from being applied (#6170)
							var innerElement = element.getFirst(),
								activePanel;
							if ( ( activePanel = innerElement.getCustomData( 'activePanel' ) ) )
								activePanel.onHide && activePanel.onHide.call( this, 1 );
							innerElement.setCustomData( 'activePanel', this );

							element.setStyles(
								{
									top : top + 'px',
									left : left + 'px'
								} );
							element.setOpacity( 1 );
						} , this );

						panel.isLoaded ? panelLoad() : panel.onLoad = panelLoad;

						// Set the panel frame focus, so the blur event gets fired.
						CKEDITOR.tools.setTimeout( function()
						{
							iframe.$.contentWindow.focus();
							// We need this get fired manually because of unfired focus() function.
							this.allowBlur( true );
						}, 0, this);
					},  CKEDITOR.env.air ? 200 : 0, this);
				this.visible = 1;

				if ( this.onShow )
					this.onShow.call( this );

				isShowing = 0;
			},

			hide : function()
			{
				if ( this.visible && ( !this.onHide || this.onHide.call( this ) !== true ) )
				{
					this.hideChild();
					this.element.setStyle( 'display', 'none' );
					this.visible = 0;
					this.element.getFirst().removeCustomData( 'activePanel' );
				}
			},

			allowBlur : function( allow )	// Prevent editor from hiding the panel. #3222.
			{
				var panel = this._.panel;
				if ( allow != undefined )
					panel.allowBlur = allow;

				return panel.allowBlur;
			},

			showAsChild : function( panel, blockName, offsetParent, corner, offsetX, offsetY )
			{
				// Skip reshowing of child which is already visible.
				if ( this._.activeChild == panel && panel._.panel._.offsetParentId == offsetParent.getId() )
					return;

				this.hideChild();

				panel.onHide = CKEDITOR.tools.bind( function()
					{
						// Use a timeout, so we give time for this menu to get
						// potentially focused.
						CKEDITOR.tools.setTimeout( function()
							{
								if ( !this._.focused )
									this.hide();
							},
							0, this );
					},
					this );

				this._.activeChild = panel;
				this._.focused = false;

				panel.showBlock( blockName, offsetParent, corner, offsetX, offsetY );

				/* #3767 IE: Second lev