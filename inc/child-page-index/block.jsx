(function(wp){
  const { __ } = wp.i18n
  const { registerBlockType } = wp.blocks
  const { InspectorControls } = wp.blockEditor && wp.blockEditor.BlockEdit ? wp.blockEditor : wp.editor
  const { ServerSideRender, PanelBody, SelectControl } = wp.components
  const { useSelect } = wp.data
  const { Fragment } = wp.element
  const React = wp.element
  const BlockIcon = (
	<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 576 512">
<g>
	<path d="M236.2,272l-198.8-0.1c-20.6,0-37.3,16.7-37.3,37.3L0,449.9c0,20.6,16.7,37.3,37.3,37.4l198.8,0.1
		c20.6,0,37.3-16.7,37.3-37.3l0.1-140.7C273.5,288.8,256.8,272,236.2,272z M45.9,431.2L46,328c0-5.6,4.5-10.1,10.1-10.1l161.3,0.1
		c5.6,0,10.1,4.5,10.1,10.1v103.3c0,5.6-4.5,10.1-10.1,10.1L56,441.3C50.4,441.3,45.9,436.8,45.9,431.2z"/>
</g>
<g>
	<path d="M136.8,337.8l-57,0c-6.8,0-12.2,5.5-12.2,12.2l0,41.9c0,6.8,5.5,12.2,12.2,12.3l57,0c6.8,0,12.2-5.5,12.2-12.2l0-41.9
		C149.1,343.3,143.6,337.8,136.8,337.8z"/>
</g>
<g>
	<path d="M538.7,272l-198.8-0.1c-20.6,0-37.3,16.7-37.3,37.3l-0.1,140.7c0,20.6,16.7,37.3,37.3,37.4l198.8,0.1
		c20.6,0,37.3-16.7,37.3-37.3l0.1-140.7C576,288.8,559.3,272,538.7,272z M348.4,431.2l0.1-103.3c0-5.6,4.5-10.1,10.1-10.1l161.3,0.1
		c5.6,0,10.1,4.5,10.1,10.1v103.3c0,5.6-4.5,10.1-10.1,10.1l-161.4-0.1C352.9,441.3,348.4,436.8,348.4,431.2z"/>
</g>
<g>
	<path d="M439.3,337.8l-57,0c-6.8,0-12.2,5.5-12.2,12.2l0,41.9c0,6.8,5.5,12.2,12.2,12.3l57,0c6.8,0,12.2-5.5,12.2-12.2l0-41.9
		C451.6,343.3,446.1,337.8,439.3,337.8z"/>
</g>
<g>
	<path d="M236.2,30.8L37.4,30.7C16.8,30.7,0.1,47.4,0.1,68L0,208.7c0,20.6,16.7,37.3,37.3,37.4l198.8,0.1
		c20.6,0,37.3-16.7,37.3-37.3l0.1-140.7C273.5,47.6,256.8,30.8,236.2,30.8z M45.9,190L46,86.8c0-5.6,4.5-10.1,10.1-10.1l161.3,0.1
		c5.6,0,10.1,4.5,10.1,10.1v103.3c0,5.6-4.5,10.1-10.1,10.1L56,200.1C50.4,200.1,45.9,195.6,45.9,190z"/>
</g>
<g>
	<path d="M136.8,96.6l-57,0c-6.8,0-12.2,5.5-12.2,12.2l0,41.9c0,6.8,5.5,12.2,12.2,12.3l57,0c6.8,0,12.2-5.5,12.2-12.2l0-41.9
		C149.1,102.2,143.6,96.6,136.8,96.6z"/>
</g>
<g>
	<path d="M538.7,30.8l-198.8-0.1c-20.6,0-37.3,16.7-37.3,37.3l-0.1,140.7c0,20.6,16.7,37.3,37.3,37.4l198.8,0.1
		c20.6,0,37.3-16.7,37.3-37.3L576,68.2C576,47.6,559.3,30.8,538.7,30.8z M348.4,190l0.1-103.3c0-5.6,4.5-10.1,10.1-10.1l161.3,0.1
		c5.6,0,10.1,4.5,10.1,10.1v103.3c0,5.6-4.5,10.1-10.1,10.1l-161.4-0.1C352.9,200.1,348.4,195.6,348.4,190z"/>
</g>
<g>
	<path d="M439.3,96.6l-57,0c-6.8,0-12.2,5.5-12.2,12.2l0,41.9c0,6.8,5.5,12.2,12.2,12.3l57,0c6.8,0,12.2-5.5,12.2-12.2l0-41.9
		C451.6,102.2,446.1,96.6,439.3,96.6z"/>
</g>
	</svg>
  );

  registerBlockType("vk-blocks/child-page-index", {
    title: __("Child page index", "veu-block"),
    icon: BlockIcon,
    category: "veu-block",
    attributes: {
      postId: {
        type: 'string',
        default: ''
      }
    },
    edit: ({attributes, setAttributes, className}) => {
      const id = 'veu_cpi' + Math.floor(Math.random() * 999)
      return (
        <Fragment>
          <InspectorControls>
            <PanelBody
              label={ __( "Parent Page", "veu-block" ) }
            >
              <label
                for={ id }
                class="components-base-control__label"
              >
                { __( 'Page Id', 'veu-block' ) }
              </label>
              <input
                type="text"
                id={ id }
                class="components-text-control__input"
                value={ attributes.postId }
                onChange={ ( e ) => { setAttributes({ postId: e.target.value }) } }
              />
            </PanelBody>
          </InspectorControls>
          <div className='veu_child_page_list_block'>
            <ServerSideRender
              block="vk-blocks/child-page-index"
              attributes={ { className: className, postId: attributes.postId } }
            />
          </div>
        </Fragment>
      )
    },
    save: () => null
  });
})(wp);
